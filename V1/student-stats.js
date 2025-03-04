// DOM elements
const statsContainer = document.getElementById('student-stats-container');

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
    setTimeout(() => {
        loadStudentStats(studentId);
    }, 800); // Simulate loading delay
});

// Load student stats
function loadStudentStats(studentId) {
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
    
    // Generate mock stats based on student status
    const stats = generateMockStats(student);
    
    // Display stats
    displayStudentStats(student, stats);
}

// Generate mock stats based on student status
function generateMockStats(student) {
    let applicationsSent, responseRate, interviewRate, offerRate;
    
    switch (student.status) {
        case 'En recherche':
            applicationsSent = Math.floor(Math.random() * 15) + 5; // 5-20
            responseRate = Math.floor(Math.random() * 30) + 10; // 10-40%
            interviewRate = Math.floor(Math.random() * 20) + 5; // 5-25%
            offerRate = 0;
            break;
        case 'Stage trouvé':
            applicationsSent = Math.floor(Math.random() * 10) + 15; // 15-25
            responseRate = Math.floor(Math.random() * 20) + 40; // 40-60%
            interviewRate = Math.floor(Math.random() * 20) + 30; // 30-50%
            offerRate = Math.floor(Math.random() * 20) + 80; // 80-100%
            break;
        case 'En attente':
            applicationsSent = Math.floor(Math.random() * 15) + 10; // 10-25
            responseRate = Math.floor(Math.random() * 30) + 20; // 20-50%
            interviewRate = Math.floor(Math.random() * 30) + 20; // 20-50%
            offerRate = Math.floor(Math.random() * 40) + 10; // 10-50%
            break;
        default:
            applicationsSent = 0;
            responseRate = 0;
            interviewRate = 0;
            offerRate = 0;
    }
    
    // Calculate derived stats
    const responsesReceived = Math.round(applicationsSent * (responseRate / 100));
    const interviewsObtained = Math.round(applicationsSent * (interviewRate / 100));
    const offersReceived = Math.round(applicationsSent * (offerRate / 100));
    
    // Generate random dates for timeline
    const today = new Date();
    const timelineEvents = [];
    
    // Add application events
    for (let i = 0; i < Math.min(5, applicationsSent); i++) {
        const daysAgo = Math.floor(Math.random() * 30) + 1;
        const date = new Date(today);
        date.setDate(date.getDate() - daysAgo);
        
        timelineEvents.push({
            date: date,
            type: 'application',
            company: getRandomCompany()
        });
    }
    
    // Add interview events if applicable
    if (interviewsObtained > 0) {
        for (let i = 0; i < Math.min(3, interviewsObtained); i++) {
            const daysAgo = Math.floor(Math.random() * 20) + 1;
            const date = new Date(today);
            date.setDate(date.getDate() - daysAgo);
            
            timelineEvents.push({
                date: date,
                type: 'interview',
                company: getRandomCompany()
            });
        }
    }
    
    // Add offer events if applicable
    if (offersReceived > 0) {
        for (let i = 0; i < Math.min(2, offersReceived); i++) {
            const daysAgo = Math.floor(Math.random() * 10) + 1;
            const date = new Date(today);
            date.setDate(date.getDate() - daysAgo);
            
            timelineEvents.push({
                date: date,
                type: 'offer',
                company: getRandomCompany()
            });
        }
    }
    
    // Sort timeline events by date (most recent first)
    timelineEvents.sort((a, b) => b.date - a.date);
    
    return {
        applicationsSent,
        responsesReceived,
        interviewsObtained,
        offersReceived,
        responseRate,
        interviewRate,
        offerRate,
        timelineEvents
    };
}

// Get random company name
function getRandomCompany() {
    const companies = [
        'TechSolutions', 'InnovateCorp', 'DataSystems', 'WebNexus', 
        'CodeCraft', 'DigitalEdge', 'SoftwareLabs', 'CloudWave',
        'CyberTech', 'NetWorks', 'AppDev', 'InfoSys'
    ];
    
    return companies[Math.floor(Math.random() * companies.length)];
}

// Format date to French format
function formatDate(date) {
    return date.toLocaleDateString('fr-FR', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric'
    });
}

// Display student stats
function displayStudentStats(student, stats) {
    // Clear loading indicator
    statsContainer.innerHTML = '';
    
    // Create student info card
    const studentCard = document.createElement('div');
    studentCard.className = 'stats-card';
    studentCard.innerHTML = `
        <div class="stats-header">
            <div class="stats-avatar">👤</div>
            <div class="stats-info">
                <h2>${student.firstName} ${student.lastName}</h2>
                <p>${student.email}</p>
                <p><strong>Statut:</strong> <span class="${
                    student.status === 'En recherche' ? 'status-searching' :
                    student.status === 'Stage trouvé' ? 'status-found' :
                    'status-waiting'
                }">${student.status}</span></p>
            </div>
        </div>
    `;
    
    // Create summary stats section
    const summarySection = document.createElement('div');
    summarySection.className = 'stats-section';
    summarySection.innerHTML = `
        <h3>Résumé de la recherche</h3>
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-value">${stats.applicationsSent}</div>
                <div class="stat-label">Candidatures envoyées</div>
            </div>
            <div class="stat-item">
                <div class="stat-value">${stats.responsesReceived}</div>
                <div class="stat-label">Réponses reçues</div>
            </div>
            <div class="stat-item">
                <div class="stat-value">${stats.interviewsObtained}</div>
                <div class="stat-label">Entretiens obtenus</div>
            </div>
            <div class="stat-item">
                <div class="stat-value">${stats.offersReceived}</div>
                <div class="stat-label">Offres reçues</div>
            </div>
        </div>
    `;
    
    // Create rates section
    const ratesSection = document.createElement('div');
    ratesSection.className = 'stats-section';
    ratesSection.innerHTML = `
        <h3>Taux de conversion</h3>
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-label">Taux de réponse</div>
                <div class="stat-value">${stats.responseRate}%</div>
                <div class="progress-container">
                    <div class="progress-bar" style="width: ${stats.responseRate}%"></div>
                </div>
            </div>
            <div class="stat-item">
                <div class="stat-label">Taux d'entretien</div>
                <div class="stat-value">${stats.interviewRate}%</div>
                <div class="progress-container">
                    <div class="progress-bar" style="width: ${stats.interviewRate}%"></div>
                </div>
            </div>
            <div class="stat-item">
                <div class="stat-label">Taux d'offre</div>
                <div class="stat-value">${stats.offerRate}%</div>
                <div class="progress-container">
                    <div class="progress-bar" style="width: ${stats.offerRate}%"></div>
                </div>
            </div>
        </div>
    `;
    
    // Create timeline section
    const timelineSection = document.createElement('div');
    timelineSection.className = 'stats-section';
    timelineSection.innerHTML = `
        <h3>Activités récentes</h3>
        <div class="timeline">
            ${stats.timelineEvents.map(event => `
                <div class="timeline-item">
                    <div class="timeline-date">${formatDate(event.date)}</div>
                    <div class="timeline-content">
                        ${event.type === 'application' ? '📝' : 
                          event.type === 'interview' ? '🗣️' : '🎉'} 
                        ${event.type === 'application' ? 'Candidature envoyée à' : 
                          event.type === 'interview' ? 'Entretien avec' : 
                          'Offre reçue de'} 
                        <strong>${event.company}</strong>
                    </div>
                </div>
            `).join('')}
        </div>
    `;
    
    // Append all sections to container
    statsContainer.appendChild(studentCard);
    statsContainer.appendChild(summarySection);
    statsContainer.appendChild(ratesSection);
    statsContainer.appendChild(timelineSection);
}