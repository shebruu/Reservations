import React from 'react';
import { Link, Head } from '@inertiajs/react';
import Navbar from './Components/Navbar';

export default function Welcome({ auth }) {
    return (
        <>
            <Head title="Welcome" />
            
          
            <Navbar />
            
            <div className="bg-gray-50 text-black dark:bg-black dark:text-white">
                <div className="flex flex-col items-center justify-center min-h-screen">
                    <div className="w-full max-w-4xl px-6">
                    <main className="flex flex-col items-center justify-center py-10 w-full">
  <div className="w-full h-screen -mt-10 flex items-center justify-center">
    <img
      src="/images/spect2.jpeg"
      alt="Descriptive Alt Text"
      className="w-full h-full object-cover rounded-md shadow-lg"
    />
  </div>
  <p className="text-center text-lg text-white absolute">
 
  </p>
</main>

                      
                        <footer className="w-full py-4 text-center text-sm">
                            © 2024 Reserva. All rights reserved.
                        </footer>
                    </div>
                </div>
            </div>
        </>
    );
}