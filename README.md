# Game 2048
Émilie Brazeau, 300209120
</br>Assignments 2 & 3, CSI 3540 Structures et normes du Web
</br>University of Ottawa, Winter 2023

## Instructions and objective
Join numbers to get to the 2048 tile! Use arrow keys to move the tiles. When two tiles having the same number touch, they join into one.
</br>
</br>
The game is over when the board is full and no more merges can be completed, no matter what direction of the arrow-key.
</br>
</br>
For example, assume we have the board on the left-hand side. By clicking on the left arrow keyboard, all rows will slide left and we will obtain the board on the right-hand side. We can observe that the 2s from the bottom rows merged with their left-neighbour to become 4s. Since two pairs of 2s merged, a total of 8 was added to the score.
</br>
</br>
Also, everytime the board changes from a slide, a new tile is added: a "2" is added 90% of the time and a "4" is added 10% of the time. In this specific case, a "4" was added and it's the one from the top row.
</br>
<img src="/docs/design_system/initialState.jpg" width="40%"/>
<span>          </span>
<img src="/docs/design_system/finalState.jpg" width="40%"/>
</br> Once you win, you will have a pop-up that will give you the choice of restarting a new game or continue playing.
<img src="/docs/design_system/2048-won.jpg" width="40%"/>
</br></br></br>
The PHP version contains a leaderboard.</br></br>
<img src="/docs/design_system/gameOver.jpg" width="70%"/></br></br>
<img src="/docs/design_system/updated-scoreboard.jpg" width="70%"/>

## Documentation
[Version JavaScript only](/docs/v1) </br>
[Version PHP](/app/models/game2048.php)</br></br>
I documented some components of the implementation, the fonts and the color palette in the [design system](/docs/design_system.md).
