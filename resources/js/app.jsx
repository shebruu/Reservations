import './bootstrap';
import '../css/app.css';
import React from 'react';
import { createRoot } from 'react-dom/client';
import { createInertiaApp } from '@inertiajs/react';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';

import Sidebar from './Pages/Components/Sidebar';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.jsx`, import.meta.glob('./Pages/**/*.jsx')),
    setup({ el, App, props }) {
        const root = createRoot(el);

        const user = JSON.parse(el.dataset.user || '{}');
        console.log('User data in app.jsx:', user);
        console.log('role data in app.jsx:', user.role_list);


        root.render(<App {...props} />);

        if (user && user.roles_list) {
            const sidebarRoot = document.getElementById('sidebar-root');
            if (sidebarRoot) {
                createRoot(sidebarRoot).render(<Sidebar user={user} />);
            }
        }
    },
    progress: {
        color: '#4B5563',
    },
});