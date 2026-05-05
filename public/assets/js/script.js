document.addEventListener("DOMContentLoaded", () => {
  const playButton = document.getElementById("play-button");
  const videoPopup = document.getElementById("video-popup");
  const popupVideo = document.getElementById("popup-video");
  const closePopup = document.getElementById("close-popup");

  // Show video popup and play video
  playButton.addEventListener("click", () => {
    videoPopup.style.display = "flex";
    popupVideo.play();
  });

  // Close video popup and stop video
  closePopup.addEventListener("click", () => {
    videoPopup.style.display = "none";
    popupVideo.pause();
    popupVideo.currentTime = 0; // Reset video to the start
  });
});

