<!DOCTYPE html>
<html>
<head>
    <title>Display Files</title>
    <style>
        ul {
            list-style-type: none;
            padding: 0;
            margin-bottom: 20px;
        }

        li {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #f0f0f0;
        }
        body {
            background: rgb(245,222,207);
            background: linear-gradient(90deg, rgba(245,222,207,1) 0%, rgba(255,243,243,1) 33%, rgba(0,212,255,1) 100%);
        }
    </style>
    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this file?");
        }
    </script>
</head>
<body>
    <h2>Display Files</h2>
    <?php
    // Directory where the files are stored
    $directory = 'uploads/';

    // Get all the files in the directory
    $files = glob($directory . '*');

    if (!empty($files)) {
        echo '<ul>';

        foreach ($files as $file) {
            // Display the file name
            echo '<li>';
            echo "<h3>File: " . basename($file) . "</h3>";

            // Display the file based on its type
            $fileExtension = pathinfo($file, PATHINFO_EXTENSION);
            if ($fileExtension === 'mp3') {
                // Display MP3 files using an audio player
                echo "<audio controls><source src=\"$file\" type=\"audio/mpeg\"></audio>";
            } elseif (in_array($fileExtension, ['jpeg', 'jpg', 'png', 'gif'])) {
                // Display image files using the <img> tag
                echo "<img src=\"$file\" alt=\"Image\">";
            } elseif (in_array($fileExtension, ['pdf'])) {
                // Display PDF files using an <embed> tag
                echo "<embed src=\"$file\" type=\"application/pdf\" width=\"100%\" height=\"600px\">";
            } elseif (in_array($fileExtension, ['txt', 'docx'])) {
                // For text and document files, provide a download link
                echo "<a href=\"$file\" download>Download File</a>";
            } else {
                // For unsupported file types, display a message
                echo "File type not supported.";
            }

            // Add delete button for each file with confirmation
            echo "<form method=\"POST\" action=\"delete.php\" onsubmit=\"return confirmDelete();\">";
            echo "<input type=\"hidden\" name=\"file\" value=\"$file\">";
            echo "<input type=\"submit\" value=\"Delete\">";
            echo "</form>";

            echo '</li>';
        }

        echo '</ul>';
    } else {
        echo "No files found.";
    }
    ?>
</body>
</html>
