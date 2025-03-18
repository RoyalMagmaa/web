#!/bin/bash

# Aller dans le dossier du projet
cd /var/www/stageo

# Récupérer les dernières modifications de GitHub
git pull origin prod

# Ajouter un log pour vérifier que ça fonctionne
echo "$(date) - Mise à jour effectuée" >> /var/log/git_update.log
