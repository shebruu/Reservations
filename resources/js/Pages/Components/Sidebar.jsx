import React from 'react';
import { Link } from '@inertiajs/inertia-react';
import "./Sidebarstyle.css";

const Sidebar = ({ user }) => {
    console.log('User data in Sidebar:', user);

   /*
    if (!user || !user.roles_list) { 
        return null;
    }*/
    const isAdmin = user.roles_list.includes('admin');
   
    return (
        <div className="sidebar">
            <Link href={route("show.index")} className="sidebar-link">
                Consulter le catalogue
            </Link>

                <>
                    <Link href={route("representation.index")} className="sidebar-link">
                        Mes réservations
                    </Link>
                   
                </>
            
       
              


                <>
                    <Link href={route('artist.index')} className="sidebar-link">CRUD Artistes</Link>
                    <Link href={route('show.index')} className="sidebar-link">CRUD Spectacles</Link>
                </>
           
               
            
        </div>
    );
};
export default Sidebar;
