<a href="/" >Return to home</a>
<br><p>-----------------</p>

<?php $count = 0; if (! empty($news) && is_array($news)) : ?>

    <?php foreach ($news as $news_item): ?>

        <h3><?= esc($news_item['title']); ?></h3>

        <div id="main-<?= esc($count); ?>" class="main text">
            <?= esc($news_item['body']); ?>
        </div>
        <p><a id='link-<?= esc($count); ?>' class="link" href="#select">Select article</a></p>
    
    <?php $count++; endforeach; ?>

<?php else : ?>

    <h3>No News</h3>

    <p>Unable to find any news for you.</p>

<?php endif ?>
<script>

    // Função para adicionar callback -> release select text
    function action(id){
        if (document.selection) { // IE
            var range = document.body.createTextRange();
            range.moveToElementText(document.getElementById("main-"+id));
            range.select();
        } else if (window.getSelection) {
            var range = document.createRange();
            range.selectNode(document.getElementById("main-"+id));
            window.getSelection().removeAllRanges();
            window.getSelection().addRange(range);
        }
    }

    // Função para adicionar uma espera de evento em t
    function load_event_listener() {
        len = document.getElementsByClassName("link").length;

        for (var i = len - 1; i >= 0; i--) {
            
            const ii = i; 
            var el = document.getElementById("link-"+i);
            
            el.addEventListener("click", function () {
                action(ii);
            }, false);
        }
    }

    load_event_listener();
</script>