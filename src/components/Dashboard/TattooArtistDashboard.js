// src/components/Dashboard/TattooArtistDashboard.js
import React from "react";

function TattooArtistDashboard() {
  // Fetch appointments and clients from API or state management
  const appointments = [
    // Sample appointment data
    { id: 1, date: "2023-04-01", clientName: "John Doe" },
    { id: 2, date: "2023-04-02", clientName: "Jane Doe" },
  ];

  return (
    <div>
      <h1>Tattoo Artist Dashboard</h1>
      {/* Display the list of appointments */}
      <ul>
        {appointments.map((appointment) => (
          <li key={appointment.id}>
            {appointment.date} - {appointment.clientName}
          </li>
        ))}
      </ul>
      {/* Add other components and functionalities */}
    </div>
  );
}

export default TattooArtistDashboard;
