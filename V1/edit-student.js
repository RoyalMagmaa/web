// DOM elements
const form = document.getElementById('edit-student-form');
const studentIdInput = document.getElementById('studentId');
const firstNameInput = document.getElementById('firstName');
const lastNameInput = document.getElementById('lastName');
const emailInput = document.getElementById('email');
const statusInput = document.getElementById('status');

// Initialize the page
document.addEventListener('DOMContentLoaded', () => {
    // Get student ID from URL
    const urlParams = new URLSearchParams(window.location.search);
    const studentId = urlParams.get('id');
    
    if (!studentId) {
        alert('ID étudiant non spécifié');
        window.location.href = 'etudiants.html';
        return;
    }
    
    // Load student data
    loadStudentData(studentId);
    
    // Add form submit event listener
    form.addEventListener('submit', handleFormSubmit);
});

// Load student data
function loadStudentData(studentId) {
    // Get students from localStorage
    const storedStudents = localStorage.getItem('students');
    
    if (!storedStudents) {
        alert('Aucune donnée étudiante trouvée');
        window.location.href = 'etudiants.html';
        return;
    }
    
    const students = JSON.parse(storedStudents);
    
    // Find student by ID
    const student = students.find(s => s.id == studentId);
    
    if (!student) {
        alert('Étudiant non trouvé');
        window.location.href = 'etudiants.html';
        return;
    }
    
    // Populate form
    studentIdInput.value = student.id;
    firstNameInput.value = student.firstName;
    lastNameInput.value = student.lastName;
    emailInput.value = student.email;
    statusInput.value = student.status;
}

// Handle form submission
function handleFormSubmit(event) {
    event.preventDefault();
    
    // Get form values
    const studentId = studentIdInput.value;
    const firstName = firstNameInput.value;
    const lastName = lastNameInput.value;
    const email = emailInput.value;
    const status = statusInput.value;
    
    // Validate form
    if (!firstName || !lastName || !email) {
        alert('Veuillez remplir tous les champs obligatoires.');
        return;
    }
    
    // Get existing students from localStorage
    const storedStudents = localStorage.getItem('students');
    
    if (!storedStudents) {
        alert('Aucune donnée étudiante trouvée');
        return;
    }
    
    const students = JSON.parse(storedStudents);
    
    // Find student etudiants
    const studentIndex = students.findIndex(s => s.id == studentId);
    
    if (studentIndex === -1) {
        alert('Étudiant non trouvé');
        return;
    }
    
    // Update student
    students[studentIndex] = {
        id: parseInt(studentId),
        firstName,
        lastName,
        email,
        status
    };
    
    // Save to localStorage
    localStorage.setItem('students', JSON.stringify(students));
    
    // Show success message
    alert('Compte étudiant modifié avec succès !');
    
    // Redirect to students list
    window.location.href = 'etudiants.html';
}