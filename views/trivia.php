<?php
include 'layout/header.php';
include 'layout/sidebar.php';

$triviaController = new TriviaController();
$questions = $triviaController->fetchTriviaQuestions();
?>

<div class="container">
    <h1>Trivia Game</h1>
    <form id="trivia-form">
        <?php foreach ($questions as $index => $question): ?>
            <div class="question-block">
                <p><?= $index + 1 . ". " . $question['question'] ?></p>
                <input type="radio" name="question_<?= $index ?>" value="A"> <?= $question['option_a'] ?><br>
                <input type="radio" name="question_<?= $index ?>" value="B"> <?= $question['option_b'] ?><br>
                <input type="radio" name="question_<?= $index ?>" value="C"> <?= $question['option_c'] ?><br>
                <input type="radio" name="question_<?= $index ?>" value="D"> <?= $question['option_d'] ?><br>
            </div>
        <?php endforeach; ?>
        <button type="submit">Submit</button>
    </form>
</div>

<script>
document.getElementById('trivia-form').addEventListener('submit', function(e) {
    e.preventDefault();
    alert('Trivia submitted!');
});
</script>

<?php include 'layout/footer.php'; ?>
