// src/components/Dashboard/ClientDashboard.js
import React from "react";

function ClientDashboard() {
  // Fetch client data, nearby studios, and tattoo artists from API or state management
  const client = {
    name: "John Doe",
    about: "I love tattoos!",
  };

  const nearbyStudios = [
    // Sample nearby studio data
    { id: 1, name: "Studio 1" },
    { id: 2, name: "Studio 2" },
  ];

  const tattooArtists = [
    // Sample tattoo artist data
    { id: 1, name: "Artist 1" },
    { id: 2, name: "Artist 2" },
  ];

  return (
    <div>
      <h1>Client Dashboard</h1>
      <h2>{client.name}</h2>
      <p>{client.about}</p>

      <h2>Nearby Studios</h2>
      <ul>
        {nearbyStudios.map((studio) => (
          <li key={studio.id}>{studio.name}</li>
        ))}
      </ul>

      <h2>Tattoo Artists</h2>
      <ul>
        {tattooArtists.map((artist) => (
          <li key={artist.id}>{artist.name}</li>
        ))}
      </ul>
      {/* Add other components and functionalities */}
    </div>
  );
}

export default ClientDashboard;
