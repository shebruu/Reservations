import React, { useState } from "react";
import { InertiaLink } from "@inertiajs/inertia-react";

const Navbar = ({ user }) => {
    const [showLoginSubMenu, setShowLoginSubMenu] = useState(false);

    return (
        <nav className="bg-white dark:bg-black shadow py-4">
            <div className="container mx-auto flex justify-between items-center px-6">
                <InertiaLink href="/" className="flex items-center">
                    <img src="/images/logo_transparent.png" alt="Logo" className="h-36 mr-3" />
                </InertiaLink>
                <div className="flex">
                    <InertiaLink className="text-gray-800 dark:text-white px-3 py-2" href={route("show.index")}>
                        Spectacles
                    </InertiaLink>
                    <InertiaLink className="text-gray-800 dark:text-white px-3 py-2" href={route("representation.index")}>
                        Réservations
                    </InertiaLink>
                    <div className="relative">
                        {user && user.id ? (
                            <InertiaLink as="button" method="post" href={route("logout")} className="text-gray-800 dark:text-white px-3 py-2">
                                Log out
                            </InertiaLink>
                        ) : (
                            <>
                                <button className="text-gray-800 dark:text-white px-3 py-2" onClick={() => setShowLoginSubMenu(!showLoginSubMenu)}>
                                    Se connecter
                                </button>
                                {showLoginSubMenu && (
                                    <div className="absolute right-0 mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-20">
                                        <InertiaLink className="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white" href={route("login")}>
                                            Se connecter
                                        </InertiaLink>
                                        <InertiaLink className="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white" href={route("register")}>
                                            S'inscrire
                                        </InertiaLink>
                                    </div>
                                )}
                            </>
                        )}
                    </div>
                </div>
            </div>
        </nav>
    );
};

export default Navbar;
