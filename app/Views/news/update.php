<a href="/" >Return to home</a>
<br><p>-----------------</p>

<style>
    textarea{ padding: 10px; }
</style>

    <?php $count = 0; if (! empty($news) && is_array($news)) : ?>

    <?php foreach ($news as $news_item): ?>

        <h3><?= esc($news_item['title']); ?></h3>

        <div class="main">
            <?= esc($news_item['body']); ?>
        </div>
        <div>
            <form class="form-update-<?= esc($count); ?> textarea-update" action="update" method="POST" style="display: none;">
                <input type="hidden" name="update-id" value="<?= esc($news_item['id']); ?>">
                <textarea class='textarea-<?= esc($count); ?> text-update' name="update-news" rows="4" cols="50" placeholder="Text for new update here" required></textarea><br>
                <input class="form-send button-send" type="submit" name="submit-textarea" value="Send update">
            </form>
        </div>
        <p><a  class='update-news' onclick='update(<?= esc($count); ?>);' href="#update">Click to update</a></p>

    <?php $count++; endforeach; ?>

    <?php else : ?>

        <h3>No News</h3>

        <p>Unable to find any news for you.</p>

    <?php endif ?>
    <script>
        function update(id){

            element_count = 0;

            for(i = 0; i <= 10; i++){
                
                element = document.getElementsByClassName("textarea-update")[i].style.display;
                
                if(element == "block"){
                    element_count = 1;
                }

                if(i == id){
                                                
                    if(element == "block"){
                        document.getElementsByClassName("textarea-update")[i].style.display = 'none';
                        document.getElementsByClassName("update-news")[i].innerText = 'Update';
                    }else{
                        document.getElementsByClassName("textarea-update")[i].style.display = 'block';
                        document.getElementsByClassName("text-update")[i].value = '';
                        document.getElementsByClassName("update-news")[i].innerText = 'Close form';
                    }
                    
                }else if(i != id && element_count > 0){
                    document.getElementsByClassName("textarea-update")[i].style.display = 'none';
                    document.getElementsByClassName("text-update")[i].value = '';
                    document.getElementsByClassName("update-news")[i].value = 'Update';
                }

            }

        }
    </script>