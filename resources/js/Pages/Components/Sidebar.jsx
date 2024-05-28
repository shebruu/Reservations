import React, { useState } from 'react';
import { InertiaLink } from '@inertiajs/inertia-react';
import "./Sidebarstyle.css";

const Sidebar = ({ user }) => {
    const [showSubMenu, setShowSubMenu] = useState(false);

    const isAdmin = user.role_list.includes('admin');

    return (
        <div className="sidebar">
            
            <InertiaLink className="sidebar-link" href="/dashboard">
                Dashboard
            </InertiaLink>
            <InertiaLink className="sidebar-link" href={route("show.index")}>
                Spectacles
            </InertiaLink>
            <InertiaLink className="sidebar-link" href={route("representation.index")}>
                Réservations
            </InertiaLink>
            <div className="relative">
                {user && user.id ? (
                    <>
                        <button className="sidebar-link" onClick={() => setShowSubMenu(!showSubMenu)}>
                            Profil
                        </button>
                        {showSubMenu && (
                            <div className="absolute left-0 mt-2 py-2 w-full bg-white rounded-md shadow-xl z-20">
                                <InertiaLink className="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white" href="/profile">
                                    Profil
                                </InertiaLink>
                                <InertiaLink className="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white" href={route("profile.edit")}>
                                    Edit profil
                                </InertiaLink>
                                <InertiaLink as="button" method="post" href={route("logout")} className="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white">
                                    Log out
                                </InertiaLink>
                            </div>
                        )}
                    </>
                ) : (
                    <>
                        <InertiaLink className="sidebar-link" href={route("login")}>
                            Se connecter
                        </InertiaLink>
                        <InertiaLink className="sidebar-link" href={route("register")}>
                            S'inscrire
                        </InertiaLink>
                    </>
                )}
            </div>

            {isAdmin && (
                <>
                    <InertiaLink href={route('artist.index')} className="sidebar-link">CRUD Artistes</InertiaLink>
                    <InertiaLink href={route('show.index')} className="sidebar-link">CRUD Spectacles</InertiaLink>
                </>
            )}
        </div>
    );
};

export default Sidebar;
