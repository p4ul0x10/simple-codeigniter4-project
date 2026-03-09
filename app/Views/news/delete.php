<a href="/" >Return to home</a>
<br><p>-----------------</p>
<style>
    form{ padding: 10px; }
</style>

    <?php $count = 0; if (! empty($news) && is_array($news)) : ?>

    <?php foreach ($news as $news_item): ?>

        <h3><?= esc($news_item['title']); ?></h3>

        <div class="main">
            <?= esc($news_item['body']); ?>
        </div>
        <div>
            <form class="form-remove-<?= esc($count); ?> form-remove" action="delete" method="POST" style="display: none;">
                <input type="hidden" name="remove-id" value="<?= esc($news_item['id']); ?>">
                <input class="form-send button-send" type="submit" name="submit-form" value="Send remove">
            </form>
        </div>
        <p><a  class='remove-news' onclick='remove(<?= esc($count); ?>);' href="#remove">Click to remove</a></p>

    <?php $count++; endforeach; ?>

    <?php else : ?>

        <h3>No News</h3>

        <p>Unable to find any news for you.</p>

    <?php endif ?>
    <script>
        function remove(id){

            element_count = 0;

            for(i = 0; i <= 10; i++){
                
                element = document.getElementsByClassName("form-remove")[i].style.display;
                
                if(element == "block"){
                    element_count = 1;
                }

                if(i == id){
                                                
                    if(element == "block"){
                        document.getElementsByClassName("form-remove")[i].style.display = 'none';
                        document.getElementsByClassName("remove-news")[i].innerText = "Click to remove";
                    }else{
                        document.getElementsByClassName("form-remove")[i].style.display = 'block';
                        document.getElementsByClassName("remove-news")[i].innerText = 'Close form';
                    }
                    
                }

            }

        }

    </script>