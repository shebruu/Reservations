import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';

export default function Dashboard({ auth }) {
    const user = auth.user;

    return (
        <AuthenticatedLayout
            user={user}
            header={
                <div className="flex items-center justify-between">
                    <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                        Bienvenue, {user.firstname} {user.lastname}!
                    </h2>
                    <div className="flex items-center">
                        <img
                            src="/path/to/user/photo.jpg" // Remplacez par le chemin réel de la photo de l'utilisateur
                            alt="User Photo"
                            className="w-10 h-10 rounded-full"
                        />
                        <span className="ml-4 text-gray-600">
                            Rôle: {user.roles_list ? user.roles_list.join(', ') : 'Aucun rôle'}
                        </span>
                    </div>
                </div>
            }
        >
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">You're logged in!</div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
