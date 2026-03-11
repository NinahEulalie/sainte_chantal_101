console.log('Script affectations.js chargé');

// Attendre que le DOM soit chargé
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM chargé');
    
    // CSRF Token
    const csrfMeta = document.querySelector('meta[name="csrf-token"]');
    if (!csrfMeta) {
        console.error('Meta CSRF token non trouvé !');
        alert('Erreur: Token CSRF manquant dans le layout.');
        return;
    }
    const csrfToken = csrfMeta.getAttribute('content');
    console.log('CSRF Token:', csrfToken.substring(0, 10) + '...');

    // Toast notification
    function showToast(message, type = 'success') {
        const toast = document.getElementById('toastNotification');
        const toastMessage = document.getElementById('toastMessage');
        
        if (!toast || !toastMessage) {
            console.warn('Toast non trouvé, utilisation de alert');
            alert(message);
            return;
        }
        
        toast.classList.remove('bg-success', 'bg-danger', 'text-white');
        toast.classList.add(type === 'success' ? 'bg-success' : 'bg-danger', 'text-white');
        toastMessage.textContent = message;
        
        const bsToast = new bootstrap.Toast(toast);
        bsToast.show();
    }

    // Affecter un élève à une classe
    const boutonsAffecter = document.querySelectorAll('.btn-affecter');
    console.log('Boutons affecter trouvés:', boutonsAffecter.length);
    
    if (boutonsAffecter.length === 0) {
        console.warn('Aucun bouton .btn-affecter trouvé dans le DOM');
    }
    
    boutonsAffecter.forEach((button, index) => {
        console.log(`Ajout listener sur bouton ${index + 1}`);
        
        button.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            console.log('=== CLIC SUR BOUTON AFFECTER ===');
            
            const eleveId = this.getAttribute('data-eleve-id');
            const classeId = this.getAttribute('data-classe-id');
            const eleveNom = this.getAttribute('data-eleve-nom');
            const classeNom = this.getAttribute('data-classe-nom');
            
            console.log('Élève ID:', eleveId);
            console.log('Classe ID:', classeId);
            console.log('Élève Nom:', eleveNom);
            console.log('Classe Nom:', classeNom);

            if (!eleveId || !classeId) {
                console.error('Données manquantes!', { eleveId, classeId });
                alert('Erreur: Données manquantes sur le bouton');
                return;
            }

            if (!confirm(`Voulez-vous affecter ${eleveNom} à la classe ${classeNom} ?`)) {
                console.log('Affectation annulée par l\'utilisateur');
                return;
            }

            console.log('Préparation de la requête AJAX...');
            
            const url = '/affectations/affecter';
            const data = {
                id_eleve: eleveId,
                id_classe: classeId
            };
            
            console.log('URL:', url);
            console.log('Données:', data);
            
            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify(data)
            })
            .then(response => {
                console.log('Statut réponse:', response.status);
                console.log('Headers:', response.headers);
                
                if (!response.ok) {
                    return response.json().then(err => {
                        throw new Error(err.message || `Erreur HTTP ${response.status}`);
                    });
                }
                return response.json();
            })
            .then(data => {
                console.log('Réponse JSON:', data);
                
                if (data.success) {
                    showToast(data.message, 'success');
                    console.log('Rechargement dans 1 seconde...');
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                } else {
                    showToast(data.message || 'Erreur inconnue', 'error');
                }
            })
            .catch(error => {
                console.error('=== ERREUR FETCH ===');
                console.error('Message:', error.message);
                console.error('Stack:', error.stack);
                showToast('Erreur: ' + error.message, 'error');
            });
        });
    });

    // Retirer un élève d'une classe
    const boutonsRetirer = document.querySelectorAll('.btn-retirer');
    console.log('Boutons retirer trouvés:', boutonsRetirer.length);
    
    boutonsRetirer.forEach((button, index) => {
        console.log(`Ajout listener retirer sur bouton ${index + 1}`);
        
        button.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            console.log('=== CLIC SUR BOUTON RETIRER ===');
            
            const eleveId = this.getAttribute('data-eleve-id');
            const classeId = this.getAttribute('data-classe-id');
            
            console.log('Retirer - Élève ID:', eleveId);
            console.log('Retirer - Classe ID:', classeId);

            if (!confirm('Voulez-vous retirer cet élève de la classe ?')) {
                console.log('Retrait annulé');
                return;
            }

            const url = `/affectations/retirer/${eleveId}/${classeId}`;
            console.log('URL retrait:', url);

            fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                }
            })
            .then(response => {
                console.log('Statut retrait:', response.status);
                return response.json();
            })
            .then(data => {
                console.log('Réponse retrait:', data);
                
                if (data.success) {
                    showToast(data.message, 'success');
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                } else {
                    showToast(data.message || 'Erreur', 'error');
                }
            })
            .catch(error => {
                console.error('Erreur retrait:', error);
                showToast('Erreur: ' + error.message, 'error');
            });
        });
    });
});