import React from 'react';
import { InertiaLink } from '@inertiajs/inertia-react';

const Navbar = () => {
    return (
        <nav className="bg-white dark:bg-black shadow py-4">
            <div className="container mx-auto flex justify-between items-center px-6">
               
               
                <InertiaLink href="/" className="flex items-center">
                    <img src="images/logo_transparent.png" alt="Logo" className="h-36 mr-3" /> {/* Adjustment */}
                   
                </InertiaLink>
                {/* Navigation Links */}
                <div className="flex">
                    <InertiaLink className="text-gray-800 dark:text-white px-3 py-2" href="/">Accueil</InertiaLink>
                    <InertiaLink className="text-gray-800 dark:text-white px-3 py-2" href={route('artist.index')}>Artistes</InertiaLink>
                    <InertiaLink className="text-gray-800 dark:text-white px-3 py-2" href={route('show.index')}>Spectacles</InertiaLink>
                    <InertiaLink className="text-gray-800 dark:text-white px-3 py-2" href={route('representation.index')}>Réservations</InertiaLink>
                    <InertiaLink className="text-gray-800 dark:text-white px-3 py-2" href="/profile">Profil</InertiaLink>
                    {/* Log In or Dashboard Link */}
                    <InertiaLink className="text-gray-800 dark:text-white px-3 py-2" href="/login">Log In</InertiaLink>
                </div>
            </div>
        </nav>
    );
};

export default Navbar;