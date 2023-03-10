# Design System

## Colour palette
| Section              | HEX code  | Color  |
|----------------------|-----------|--------|
| Background           | `#000000` |   ![#000000](https://placehold.co/15x15/000000/000000.png) - Black|
| Grid                 | `#323232` |   ![#323232](https://placehold.co/15x15/323232/323232.png) - Light grey|
| Empty tile           | `#515151` |   ![#515151](https://placehold.co/15x15/515151/515151.png) - Dark grey|
| Tile 2 background    | `#ffd4db` |   ![#ffd4db](https://placehold.co/15x15/ffd4db/ffd4db.png) - Very light pink|
| Tile 2 text          | `#ff5e7a` |   ![#ff5e7a](https://placehold.co/15x15/ff5e7a/ff5e7a.png) - Pink|
| Tile 4 background    | `#ffacbb` |   ![#ffacbb](https://placehold.co/15x15/ffacbb/ffacbb.png) - Lighter pink|
| Tile 4 text          | `#ff375a` |   ![#ff375a](https://placehold.co/15x15/ff375a/ff375a.png) - Dark pink|
| Tile 8 background    | `#ff859a` |   ![#ff859a](https://placehold.co/15x15/ff859a/ff859a.png) - Light pink|
| Tile 16 background   | `#ff5e7a` |   ![#ff5e7a](https://placehold.co/15x15/ff5e7a/ff5e7a.png) - Pink (again)|
| Tile 32 background   | `#ff375a` |   ![#ff375a](https://placehold.co/15x15/ff375a/ff375a.png) - Dark pink|
| Tile 64 background   | `#ff0f39` |   ![#ff0f39](https://placehold.co/15x15/ff0f39/ff0f39.png) - Almost red|
| Tile 128 background  | `#a7d8fd` |   ![#a7d8fd](https://placehold.co/15x15/a7d8fd/a7d8fd.png) - Very light blue|
| Tile 128 text        | `#043a63` |   ![#043a63](https://placehold.co/15x15/043a63/043a63.png) - Dark blue|
| Tile 256 background  | `#33a1f6` |   ![#33a1f6](https://placehold.co/15x15/33a1f6/33a1f6.png) - Blue
| Tile 512 background  | `#4fb48f` |   ![#4fb48f](https://placehold.co/15x15/4fb48f/4fb48f.png) - Green|
| Tile 1024 background | `#ba7cda` |   ![#ba7cda](https://placehold.co/15x15/ba7cda/ba7cda.png) - Purple|
| Tile 2048 background | `rainbow` |![#ffb3ba](https://placehold.co/15x15/ffb3ba/ffb3ba.png)![#ffdfba](https://placehold.co/15x15/ffdfba/ffdfba.png)![#ffffba](https://placehold.co/15x15/ffffba/ffffba.png)![#baffc9](https://placehold.co/15x15/baffc9/baffc9.png)![#a8e6cf](https://placehold.co/15x15/a8e6cf/a8e6cf.png)![#bae1ff](https://placehold.co/15x15/bae1ff/bae1ff.png)![#dbdcff](https://placehold.co/15x15/dbdcff/dbdcff.png)![#eecbff](https://placehold.co/15x15/eecbff/eecbff.png)|
| Tile 4096 background | `#e1aefa` |   ![#e1aefa](https://placehold.co/15x15/e1aefa/e1aefa.png) - Very light purple|
| Tile 8192 background | `#73e0b8` |   ![#73e0b8](https://placehold.co/15x15/73e0b8/73e0b8.png) - Very light green|
| Other tiles' text    | `#ffffff` |   ![#ffffff](https://placehold.co/15x15/ffffff/ffffff.png) - White|
| Popup background     | `#ffacbb` |   ![#ffacbb](https://placehold.co/15x15/ffacbb/ffacbb.png) - Lighter pink (again)|
| Popup button         | `#ff5e7a` |   ![#ff5e7a](https://placehold.co/15x15/ff5e7a/ff5e7a.png) - Pink (again)|


## Fonts
<p>*** Some background colors are not appearing on GitHub but would be on other visualizers. ***</p>
<h1 style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">
    Heading 1 with tag "h1"
</h1>


<h2 style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">
    Heading 2 with tag "h2"
</h2>

<p style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">
    Paragraph with tag "p"
</p>

<span style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; font-weight: bolder; background-color: #ffacbb; color: #ff375a;">
    Span with tag "span" in popup
</span>
<br>
<br>

## Buttons
<span style="background-color: #ff5e7a; color: white;">
Buttons with tag ".popup button"
</span>
<br>
<br>

## UI components
The implementation of the header, the scoreboard and the board was simple. All of them were included in a "div" with an unique id "backdrop" because when a player wins, a pop-up appears and the background (this content) blurs. For the title, "h1" was used and for the score, "h2" was used. The latter also included a span with an unique id to be able to update the score whenever tiles merge.
<br>
<br>
<img src=/docs/design_system/2048-grid.jpg width = 40%>
<br>
<br>
As previously mentioned, a pop-up appears when a player wins. In the JavaScript, there is a function called gameWon() that makes the pop-up visible (because it was set to "hidden" before that trigger). This function is called whenever the number 2048 is added to the score and that the game has not already been won (in case someone plays beyond their victory and reaches 2048 again). The two buttons have "onClick" features and calls the corresponding function to either continue playing (simply close pop-up) or restart (close pop-up and reinitialise the board).
<br>
<br>
A similar pop-up appears whenever the board is completely full and no sliding can be done anymore. The only option is to restart.
<br>
<br>
<img src=/docs/design_system/2048-won.jpg width = 40%>

