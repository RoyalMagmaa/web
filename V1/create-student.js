// DOM elements
const form = document.getElementById('create-student-form');

// Initialize the page
document.addEventListener('DOMContentLoaded', () => {
    // Add form submit event listener
    form.addEventListener('submit', handleFormSubmit);
});

// Handle form submission
function handleFormSubmit(event) {
    event.preventDefault();
    
    // Get form values
    const firstName = document.getElementById('firstName').value;
    const lastName = document.getElementById('lastName').value;
    const email = document.getElementById('email').value;
    const status = document.getElementById('status').value;
    
    // Validate form
    if (!firstName || !lastName || !email) {
        alert('Veuillez remplir tous les champs obligatoires.');
        return;
    }
    
    // Get existing students from localStorage or create empty array
    let students = [];
    const storedStudents = localStorage.getItem('students');
    if (storedStudents) {
        students = JSON.parse(storedStudents);
    }
    
    // Create new student object
    const newStudent = {
        id: Date.now(), // Use timestamp as temporary ID
        firstName,
        lastName,
        email,
        status
    };
    
    // Add new student
    students.push(newStudent);
    
    // Save to localStorage
    localStorage.setItem('students', JSON.stringify(students));
    
    // Show success message
    alert('Compte étudiant créé avec succès !');
    
    // Redirect to students list
    window.location.href = 'etudiants.html';
}