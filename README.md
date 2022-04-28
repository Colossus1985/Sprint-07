Wireframe du site : https://www.figma.com/file/LUPdLjdUROYCjkWCUlVd4f/Sprint_07?node-id=0%3A1

# Acces page d'accueil

```mermaid
sequenceDiagram
participant Navigateur
participant Route
participant Controller
participant Model
participant Vue

Navigateur->>Route: get("/") $data['users']id Nom du site
Route->>Controller:appelle la methode "mainView" "userController.php"
Controller->>Model: insertion des données en base
Model->>Controller: succès de l'insertion des données
Controller->>Vue: passage des données à la vue
Vue->>Navigateur: retourne le rendu CSS

```
# Création d'un poste

```mermaid
sequenceDiagram
participant Navigateur
participant Route
participant Controller
participant Model
participant Vue

Navigateur->>Route: get(comments/create) $data['movies']  Titre, affiche, synopsis
Route->>Controller: appelle la methode "create" de "commentsCRUDController.php" controller
Controller->>Model: insertion des données en base
Model->>Controller: succès de l'insertion des données
Controller->>Vue: passage des données à la vue
Vue->>Navigateur: retourne le rendu HTML

```
# Lecture d'un poste

```mermaid
sequenceDiagram
participant Navigateur
participant Route
participant Controller
participant Model
participant Vue

Navigateur->>Route: get('detailMovie') $data['movies']: Titre, affiche, synopsis
Route->>Controller: appelle la methode 'movies.detailMovie' 'forumMoviesCRUDController.php'
Controller->>Model: insertion des données en base
Model->>Controller: succès de l'insertion des données
Controller->>Vue: passage des données à la vue
Vue->>Navigateur: retourne le rendu HTML

```
# Modification d'un poste

```mermaid
sequenceDiagram
participant Navigateur
participant Route
participant Controller
participant Model
participant Vue

Navigateur->>Route: get(comments/{comment}/edit)) $data['movies'] poste à modifier
Route->>Controller: appelle la methode 'commentArea' du 'forumMoviesCRUDController.php' 
Controller->>Model: modification des données en base
Model->>Controller: succès de l'insertion des nouvelles données
Controller->>Vue: passage des données à la vue
Vue->>Navigateur: retourne le rendu HTML

```
# Suppression d'un poste

```mermaid
sequenceDiagram
participant Navigateur
participant Route
participant Controller
participant Model
participant Vue

Navigateur->>Route: delete( movies/{movie}) data: $data['movies'] duChoix du poste à supprimer
Route->>Controller: appelle la methode "detroy" de 'forumMoviesCRUDController.php'
Controller->>Model: la methode fait appel au model pour donner l'ordre de supprimer le commentaire dans la base de données 
Model->>Controller: succès de la suppression des données
Controller->>Vue: passage des données à la vue
Vue->>Navigateur: retourne un message de suppression

```
