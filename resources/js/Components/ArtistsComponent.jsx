import React from 'react';

const ArtistsComponent = () => {
  // Accès sécurisé aux données window.artists avec une valeur par défaut []
  const artists = window.artists || [];

  return (
    <div>
      <h2>Liste des Artistes</h2>
      <ul>
        {artists.map((artist, index) => (
          <li key={index}>{artist.firstname} {artist.lastname}</li>
        ))}
      </ul>
    </div>
  );
}

export default ArtistsComponent;