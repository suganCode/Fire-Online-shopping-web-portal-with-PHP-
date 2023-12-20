<?php
try {
    // Connect to SQLite database (replace 'your_database.db' with the actual name of your SQLite database file)
    $db = new SQLite3('Database1.db');

    // Define the SQL statement to add a new column to an existing table
    // $sql = "ALTER TABLE consumer ADD COLUMN supplierid INTEGER";

    $sql = "UPDATE consumer SET supplierid =3";

    // Execute the SQL statement
    $db->exec($sql);

    echo "New column added successfully.";

} catch (Exception $e) {
    // Handle exceptions
    echo "Error: " . $e->getMessage();
} finally {
    // Close the database connection
    $db->close();
}
?>
