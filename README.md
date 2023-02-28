# Game 2048
Émilie Brazeau, 300209120
</br>Assignment 2, CSI 3540 Structures et normes du Web
</br>University of Ottawa, Winter 2023

## Instructions and objective
Join numbers to get to the 2048 tile! Use arrow keys to move the tiles. When two tiles having the same number touch, they join into one.

For example, assume we have the board on the left-hand side. By clicking on the left arrow keyboard, all rows will slide left and we will obtain the board on the right-hand side. We can observe that the 2s from the bottom rows merged with their left-neighbour to become a 4.
</br>
</br>
Also, everytime the board changes from a slide, a new tile is added: a "2" is added 90% and a "4" is added 10% of the time. In this specific case, a "4" was added and it's the one from the top row.
</br>
<img src="/docs/initialState.jpg" width="40%"/>
<span>          </span>
<img src="/docs/finalState.jpg" width="40%"/>
</br> Once you win, you will have a pop-up that will give you the choice of restarting a new game or continue playing.
<img src="/assets/design_system/2048-won.jpg" width="40%"/>

## Documentation
I [documented](/assets/design_system/) some components of the implementation and I also included a [design system](/docs/design_system.md).
