import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';

export default function Dashboard({ user, upcomingEvents }) {
    return (
        <AuthenticatedLayout
            user={user}
            header={
                <div className="flex items-center justify-between bg-blue-600 p-4 rounded-md shadow-md">
                    <h2 className="font-semibold text-xl text-white leading-tight">
                        Bienvenue, {user.firstname} {user.lastname}!
                    </h2>
                    <div className="flex items-center">
                        <img
                            src="/path/to/user/photo.jpg" // Remplacez par le chemin réel de la photo de l'utilisateur
                            alt="User Photo"
                            className="w-10 h-10 rounded-full"
                        />
                        <span className="ml-4 text-white">
                            Rôle: {user.role_list ? user.role_list.join(', ') : 'Aucun rôle'}
                        </span>
                    </div>
                </div>
            }
        >
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">
                            <h3 className="text-lg font-semibold mb-4">Événements à Venir</h3>
                            <ul>
                                {upcomingEvents.length > 0 ? upcomingEvents.map(event => (
                                    <li key={event.id} className="mb-2">
                                        <div className="p-4 bg-blue-100 rounded-md shadow-md">
                                            <h4 className="text-md font-semibold">{event.show.title}</h4>
                                            <p className="text-sm">{new Date(event.when).toLocaleDateString()} - {event.location ? event.location.designation : 'Lieu non spécifié'}</p>
                                        </div>
                                    </li>
                                )) : (
                                    <p>Aucun événement à venir</p>
                                )}
                            </ul>
                        </div>
                    </div>
                    {/* Section pour les billets réservés - Ajoutez votre propre logique ici */}
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
