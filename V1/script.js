// DOM elements
const studentsContainer = document.getElementById('students-container');
const searchInput = document.getElementById('input-recherche');
const statusSelect = document.getElementById('status-select');
const loadingElement = document.getElementById('loading');
const noResultsElement = document.getElementById('no-results');

// Initialize the page
document.addEventListener('DOMContentLoaded', () => {
    // Load students from localStorage or use mock data
    let students = loadStudents();
    
    // Simulate loading delay
    setTimeout(() => {
        loadingElement.classList.add('hidden');
        displayStudents(students);
    }, 800);

    // Add event listeners
    searchInput.addEventListener('input', filterStudents);
    statusSelect.addEventListener('change', filterStudents);
});

// Load students from localStorage or use mock data
function loadStudents() {
    const storedStudents = localStorage.getItem('students');
    
    if (storedStudents) {
        return JSON.parse(storedStudents);
    } else {
        // Mock student data if none in localStorage
        const mockStudents = [
            { id: 1, firstName: 'Jean', lastName: 'Dupont', email: 'jean.dupont@email.com', status: 'En recherche' },
            { id: 2, firstName: 'Marie', lastName: 'Martin', email: 'marie.martin@email.com', status: 'Stage trouvé' },
            { id: 3, firstName: 'Pierre', lastName: 'Bernard', email: 'pierre.bernard@email.com', status: 'En attente' },
            { id: 4, firstName: 'Sophie', lastName: 'Petit', email: 'sophie.petit@email.com', status: 'En recherche' },
            { id: 5, firstName: 'Thomas', lastName: 'Robert', email: 'thomas.robert@email.com', status: 'Stage trouvé' },
        ];
        
        // Save mock data to localStorage
        localStorage.setItem('students', JSON.stringify(mockStudents));
        
        return mockStudents;
    }
}

// Display students in the container
function displayStudents(studentsToDisplay) {
    studentsContainer.innerHTML = '';
    
    if (studentsToDisplay.length === 0) {
        noResultsElement.classList.remove('hidden');
        return;
    }
    
    noResultsElement.classList.add('hidden');
    
    studentsToDisplay.forEach(student => {
        const studentCard = createStudentCard(student);
        studentsContainer.appendChild(studentCard);
    });
}

// Create a student card element
function createStudentCard(student) {
    const card = document.createElement('div');
    card.className = 'student-card';
    
    // Determine status class
    let statusClass = '';
    if (student.status === 'En recherche') {
        statusClass = 'status-searching';
    } else if (student.status === 'Stage trouvé') {
        statusClass = 'status-found';
    } else {
        statusClass = 'status-waiting';
    }
    
    // Create card content
    card.innerHTML = `
        <div class="student-header">
            <div class="student-info">
                <div class="student-avatar">👤</div>
                <div>
                    <h3 class="student-name">${student.firstName} ${student.lastName}</h3>
                    <p class="student-email">${student.email}</p>
                </div>
            </div>
            <span class="student-status ${statusClass}">${student.status}</span>
        </div>
        <div class="student-actions">
            <a href="edit-student.html?id=${student.id}" class="action-button edit-button">
                ✏️ Modifier
            </a>
            <button class="action-button delete-button" data-id="${student.id}">
                🗑️ Supprimer
            </button>
            <a href="student-stats.html?id=${student.id}" class="action-button stats-button">
                📊 Statistiques
            </a>
        </div>
    `;
    
    // Add delete event listener
    const deleteButton = card.querySelector('.delete-button');
    deleteButton.addEventListener('click', () => {
        handleDeleteStudent(student.id);
    });
    
    return card;
}

// Filter students based on search input and status select
function filterStudents() {
    const searchTerm = searchInput.value.toLowerCase();
    const selectedStatus = statusSelect.value;
    
    // Get current students from localStorage
    const students = loadStudents();
    
    const filteredStudents = students.filter(student => {
        const matchesSearch = searchTerm === '' || 
            student.firstName.toLowerCase().includes(searchTerm) ||
            student.lastName.toLowerCase().includes(searchTerm) ||
            student.email.toLowerCase().includes(searchTerm);
        
        const matchesStatus = selectedStatus === '' || student.status === selectedStatus;
        
        return matchesSearch && matchesStatus;
    });
    
    displayStudents(filteredStudents);
}

// Handle student deletion
function handleDeleteStudent(id) {
    if (confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?')) {
        // Get current students from localStorage
        let students = loadStudents();
        
        // Find student index
        const index = students.findIndex(student => student.id == id);
        
        if (index !== -1) {
            // Remove student from array
            students.splice(index, 1);
            
            // Save updated students to localStorage
            localStorage.setItem('students', JSON.stringify(students));
            
            // Refresh display
            filterStudents();
        }
    }
}