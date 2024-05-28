import React from 'react';
import { Link } from '@inertiajs/inertia-react';
import "./Sidebarstyle.css";

const Sidebar = ({ user }) => {
    console.log('User data in Sidebar:', user);

   
    
    const isAdmin = user.role_list.includes('admin');

    console.log('User data in Sidebar:', user.role_list);
    //const isAdmin = false;
    return (
        <div className="sidebar">
            

    
                <>
                    <Link href={route("representation.index")} className="sidebar-link">
                        Mes réservations
                    </Link>
                </>
   

            {isAdmin && (
                <>
                    <Link href={route('artist.index')} className="sidebar-link">CRUD Artistes</Link>
                    <Link href={route('show.index')} className="sidebar-link">CRUD Spectacles</Link>
                 
                </>
            )}
        </div>
    );
};
export default Sidebar;