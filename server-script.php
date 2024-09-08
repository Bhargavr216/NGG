<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
    $image = $_FILES['image']['tmp_name'];
    $video = 'VN20240908_183020.mp4'; // Path to your video file
    $output = 'output.mp4';

    // Command to overlay image on video
    $cmd = "ffmpeg -i $video -i $image -filter_complex \"overlay=10:main_h-overlay_h-10\" $output";
    exec($cmd);

    // Provide the result video
    header('Content-Type: video/mp4');
    header('Content-Disposition: attachment; filename="' . basename($output) . '"');
    readfile($output);
    exit();
}
?>
