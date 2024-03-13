pipeline {
    agent any

    stages {
        stage('Cloner le code') {
            steps {
                git 'https://github.com/AntoninMasson/Projet-CICD.git'
            }
        }

        stage('Installer les dépendances avec Composer') {
            steps {
                script {
                    sh 'composer install'
                }
            }
        }

        stage('Exécuter les tests PHPUnit') {
            steps {
                script {
                    sh 'vendor/bin/phpunit index.php'
                }
            }
        }

        stage('Analyse du code avec PHPStan') {
            steps {
                script {
                    sh 'vendor/bin/phpstan analyse backend'
                }
            }
        }

        stage('Construire et déployer les images Docker') {
            steps {
                script {
                    sh 'docker build -t test-php-docker-app-backend ./backend/'
                    sh 'docker build -t test-php-docker-app-frontend ./frontend/'
                    sh 'docker build -t mysql ./'

                    sh 'docker run -d --name backend-1 -p 8081:80 test-php-docker-app-backend'
                    sh 'docker run -d --name frontend-1 -p 80:80 test-php-docker-app-frontend'
                    sh 'docker run -d --name db-1 -p 3306:3306 mysql'
                }
            }
        }
    }
}
