<a href="/" >Return to home</a>
<br><p>-----------------</p>

<?= \Config\Services::validation()->listErrors(); ?>

<form action="/news/create" method="post">
    <?= csrf_field() ?>

    <label for="title">Title</label>
    <input type="input" name="title" /><br />
    <br>
    <label for="body">Text</label>
    <textarea name="body" rows="4" cols="50"></textarea><br />
    <br>
    <input type="submit" name="submit" value="Create news item" />
</form>
<br>