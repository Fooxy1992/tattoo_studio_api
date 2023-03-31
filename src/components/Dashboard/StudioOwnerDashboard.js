// src/components/Dashboard/StudioOwnerDashboard.js
import React from "react";

function StudioOwnerDashboard() {
  // Fetch clients and tattoo artists from API or state management
  const clients = [
    // Sample client data
    { id: 1, name: "John Doe" },
    { id: 2, name: "Jane Doe" },
  ];

  const tattooArtists = [
    // Sample tattoo artist data
    { id: 1, name: "Artist 1" },
    { id: 2, name: "Artist 2" },
  ];

  return (
    <div>
      <h1>Studio Owner Dashboard</h1>
      {/* Display the list of clients and tattoo artists */}
      <h2>Clients</h2>
      <ul>
        {clients.map((client) => (
          <li key={client.id}>{client.name}</li>
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

export default StudioOwnerDashboard;
