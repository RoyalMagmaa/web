#!/bin/bash

# Exemple de déploiement automatique
echo "Déploiement en cours..."

# Exemple de mise à jour du serveur avec git pull
cd /var/www/stageo || exit 1
git pull origin prod

# Ajoute d'autres étapes comme le redémarrage d'un serveur, si nécessaire
echo "Déploiement terminé."
