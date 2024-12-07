document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll(".edit-btn").forEach(function (editBtn) {
    editBtn.addEventListener("click", function () {
      var questionId = this.getAttribute("data-id");
      var container = this.closest(".container-fluid");
      container.querySelector(".question-text").style.display = "none";
      container.querySelector(".edit-question").style.display = "block";
      container.querySelector(".edit-btn").style.display = "none";
      container.querySelector(".save-btn").style.display = "inline-block";
    });
  });

  document.querySelectorAll(".save-btn").forEach(function (saveBtn) {
    saveBtn.addEventListener("click", function () {
      var questionId = this.getAttribute("data-id");
      var container = this.closest(".container-fluid");
      var newQuestionText = container.querySelector(".edit-question").value;

      // Send AJAX request to update the question in the database
      $.ajax({
        url: "update.php",
        type: "POST",
        data: {
          id: questionId,
          question_text: newQuestionText,
        },
        success: function (response) {
          if (response === "success") {
            container.querySelector(".question-text").textContent =
              newQuestionText;
            container.querySelector(".question-text").style.display = "inline";
            container.querySelector(".edit-question").style.display = "none";
            container.querySelector(".edit-btn").style.display = "inline-block";
            container.querySelector(".save-btn").style.display = "none";
          } else {
            alert("Failed to update question. Please try again.");
          }
        },
        error: function () {
          alert("Error updating question. Please try again.");
        },
      });
    });
  });
});
