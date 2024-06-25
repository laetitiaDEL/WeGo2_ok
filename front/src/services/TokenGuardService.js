const tokenGuard = async (to, from, next) => {
    const token = localStorage.getItem('token_WeGo2');
    if (token) {
        // Si on trouve le token, on autorise l'accès
        next();
    } else {
        // Si pas de token, on redirige vers la page de connexion
        next('/connexion');
    }
}
export default tokenGuard;












