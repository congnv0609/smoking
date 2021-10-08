import ExampleComponent from './components/ExampleComponent'
import User from './components/User'

const routes = [
    {
        path: '/admin/example',
        component: ExampleComponent,
        name: 'example',
    },
    {
        path: '/admin/users',
        component: User,
        name: 'user',
    },
];

export default routes;