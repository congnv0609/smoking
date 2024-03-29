export function initialize(store, router) {
    router.beforeEach((to, from, next) => {
        const requiresAuth = to.matched.some(record => record.meta.requiresAuth);
        const currentUser = store.state.Auth.currentUser;
        if (requiresAuth && !currentUser) {
            next('/pages/login');
        } else if (to.path === '/pages/login' && currentUser) {
            next('/');
        } else {
            if (store.getters.CURRENT_USER) {
                axios.defaults.headers.common['Authorization'] = `Bearer ${store.getters.CURRENT_USER.token}`;
            }
            next();
        }
    });

    axios.interceptors.response.use(null, (error) => {
        if (error.response.status === 401) {
            store.commit('LOGOUT');
            router.push('/pages/login');
        }

        return Promise.reject(error);
    });

    // if (store.getters.CURRENT_USER) {
    //     axios.defaults.headers.common['Authorization'] = `Bearer ${store.getters.CURRENT_USER.token}`;
    // }
}

