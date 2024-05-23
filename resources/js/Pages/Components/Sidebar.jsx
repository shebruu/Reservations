
import React from 'react';
import { Link } from '@inertiajs/inertia-react';
import "./Sidebarstyle.css";



const Sidebar = ({  }) => {


    return (

        
        <div className="sidebar">

        {/* Liens toujours affichés */}
        <Link href={route("show.index")} className="sidebar-link">
           Consulter le catalogue 
        </Link>
        
        <Link href={route('artist.index')} className="sidebar-link">Artistes</Link>
        {/* Conditionnellement afficher ces liens si tripId est présent */}
      
            
       
             
                <Link href={route("representation.index")} className="sidebar-link">
                    Réserver des places 
                </Link>
             
               
                
           
    
    </div>
);
};

export default Sidebar;