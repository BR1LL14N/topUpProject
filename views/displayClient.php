<?php
// MENGAMBIL DATA GAME DARI CONTROLLER UNTUK CLIENT
    $hasil = new clientController();
    $result = $hasil->displayGameClient();
?>
<div class="mt-5 flex flex-col items-center px-4">
    <h4 class="text-2xl font-bold mt-10">Game</h4>

    <div class="game-cards-container my-8 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-6 w-full max-w-7xl justify-items-center">
        <?php foreach ($result as $row) : ?>
            <div class="game-card bg-white shadow-md rounded-lg p-4 flex flex-col items-center w-full max-w-[180px] hover:shadow-lg transition-transform transform hover:scale-105">
                <a href="./indexClient.php?gameID=<?php echo $row['game_id']; ?>&modul=itemGame&fitur=displayItem">
                    <img 
                        src="./src/<?php echo htmlspecialchars($row['game_icon']); ?>" 
                        alt="<?php echo htmlspecialchars($row['game_name']); ?>" 
                        class="game-icon w-32 h-32 object-cover mb-3"
                    >
                </a>
                <div class="game-info text-center">
                    <h3 class="game-name text-base font-semibold text-gray-800">
                        <?php echo htmlspecialchars($row['game_name']); ?>
                    </h3>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

