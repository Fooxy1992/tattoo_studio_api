// src/components/Dashboard/AppOwnerDashboard.js
import React from "react";

function AppOwnerDashboard() {
  // Fetch all studios from API or state management
  const studios = [
    // Sample studio data
    { id: 1, name: "Studio 1" },
    { id: 2, name: "Studio 2" },
  ];

  return (
    <div>
      <h1>App Owner Dashboard</h1>
      {/* Display the list of studios */}
      <ul>
        {studios.map((studio) => (
          <li key={studio.id}>{studio.name}</li>
        ))}
      </ul>
      {/* Add other components and functionalities */}
    </div>
  );
}

export default AppOwnerDashboard;
