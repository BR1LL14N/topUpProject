<?php
// MENGAMBIL DATA GAME DARI CONTROLLER UNTUK CLIENT
    $hasil = new clientController();
    $result = $hasil->displayGameClient();
?>
<div class="mt-5 flex flex-col items-center">
    <h4 class="text-2xl font-bold mt-10">Game</h4>

    <div class="game-cards-container my-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 items-center">
        <?php foreach ($result as $row) : ?>
            <div class="game-card bg-white shadow-lg rounded-lg p-4 flex flex-col items-center">
                <a href="./indexClient.php?gameID=<?php echo $row['game_id']; ?>&modul=itemGame&fitur=displayItem">
                    <img 
                        src="./src/<?php echo htmlspecialchars($row['game_icon']); ?>" 
                        alt="<?php echo htmlspecialchars($row['game_name']); ?>" 
                        class="game-icon w-24 h-24 object-cover mb-4"
                    >
                </a>
                <div class="game-info text-center">
                    <h3 class="game-name text-lg font-semibold text-gray-800 mb-2">
                        <?php echo htmlspecialchars($row['game_name']); ?>
                    </h3>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

