let grid;
let score = 0;
let columns = 4;
let rows = 4;

window.onload = function(){
    initialization();
}

function initialization(){
    // grid = [
    //     [0,0,0,0],
    //     [0,0,0,0],
    //     [0,0,0,0],
    //     [0,0,0,0]
    // ]
    
    grid = [
        [2,4,8,16],
        [32,64,128,256],
        [512,1024,2048,4096],
        [8192,4,2,0]
    ]

    for(let r = 0; r < rows; r++){
        for(let c = 0; c < columns; c++){
            let tile = document.createElement("div");
            tile.id = r.toString() + "," + c.toString();
            let number = grid[r][c];
            updateTile(tile, number);
            document.getElementById("grid").append(tile);
        }
    }
    addNewTwo();
    addNewTwo();
}

function updateTile(tile, number){
    tile.innerText = "";
    tile.classList.value = "";
    tile.classList.add("tile");
    if(number > 0){
        tile.innerText = number;
        if(number <= 4096){
            tile.classList.add("tile"+number.toString());
        } else{
            tile.classList.add("tile8192")
        }
    }
}

document.addEventListener("keyup", (fleche) =>{
    let initialGrid = copyGrid(grid);
    if (fleche.code == "ArrowLeft"){
        slideLeft();
    }
    if (fleche.code == "ArrowRight"){
        slideRight();
    }
    if (fleche.code == "ArrowUp"){
        slideUp();
    }
    if (fleche.code == "ArrowDown"){
        slideDown();
    }
    document.getElementById("score").innerText = score;
    
    if(gridHasChanged(initialGrid,grid)){
        addNewTwo();
        if(isFull() && isOver()){
            gameOver();
        }
    }
})

function isOver(){
    let board = copyGrid(grid);
    for (let i = 0; i < rows; i++){
        let currentRow = board[i];
        let currentColumn = [grid[0][i], grid[1][i], grid[2][i], grid[3][i]];
        for(let c = 0; c < currentRow.length - 1; c++){
            if(currentRow[c] == currentRow[c+1] || currentColumn[c] == currentColumn[c+1]){
                return false;
            }
        }
    }
    return true;
}

// function reset(finalGrid){
//     grid = finalGrid;
//     for(let r = 0; r<rows; r++){
//         for(letc = 0; c<columns; c++){
//             let tile = document.getElementById(r.toString()+","+c.toString());
//             let number = grid[r][c];
//             updateTile(tile,number);
//         }
//     }
// }

function gameOver(){
    let popup = document.getElementById("popup");
    let backdrop = document.getElementById("backdrop");
    popup.classList.add("open-popup");
    document.getElementById("scorePopup").innerText = score;
    backdrop.classList.add('blur');
}

function tryAgain(){
    let popup = document.getElementById("popup");
    let backdrop = document.getElementById("backdrop");
    
    grid = [
        [0,0,0,0],
        [0,0,0,0],
        [0,0,0,0],
        [0,0,0,0]
    ]

    for(let r = 0; r < rows; r++){
        for(let c = 0; c< columns; c++){
            let tile = document.getElementById(r.toString()+","+c.toString());
            tile.innerText = "";
            tile.classList.value = "";
            tile.classList.add("tile");
        }
    }

    document.getElementById("scorePopup").innerText = 0;
    document.getElementById("score").innerText = score;
    addNewTwo();
    addNewTwo();

    popup.classList.remove("open-popup");
    backdrop.classList.remove('blur');
}

function filterZeros(row){
    return row.filter(number => number != 0);
}

function slide(row){
    row = filterZeros(row);

    for (let i = 0; i < row.length-1; i++){
        if(row[i] == row[i+1]){
            row[i] *= 2;
            row[i+1] = 0;
            score += row[i];
        }
    }

    row = filterZeros(row);

    while(row.length < columns){
        row.push(0);
    }

    return row;
}

function gridHasChanged(initialGrid,finalGrid){
    for(let r = 0; r < rows; r++){
        for(let c = 0; c < columns; c++){
            if(initialGrid[r][c] != finalGrid[r][c]){
                return true;
            }
        }
    }
    return false;
}

function copyGrid(grid){
    let copy = [
        [0,0,0,0],
        [0,0,0,0],
        [0,0,0,0],
        [0,0,0,0]
    ]
    for(let c = 0; c < columns; c++){
        for(let r = 0; r < rows; r++){
            copy[r][c] = grid[r][c];
        }
    }
    return copy;
}

function slideLeft(){
    for(let r = 0; r < rows; r++){
        let row = grid[r];
        row = slide(row);
        grid[r] = row;

        for (let c = 0; c < columns; c++){
            let tile = document.getElementById(r.toString()+","+c.toString());
            let number = grid[r][c];
            updateTile(tile,number);
        }
    }
}

function slideRight(){
    for(let r = 0; r < rows; r++){
        let row = grid[r];
        row.reverse();
        row = slide(row);
        row.reverse();
        grid[r] = row;

        for (let c = 0; c < columns; c++){
            let tile = document.getElementById(r.toString()+","+c.toString());
            let number = grid[r][c];
            updateTile(tile,number);
        }
    }
}

function slideUp(){
    for (let c = 0; c < columns; c++){
        let row = [grid[0][c], grid[1][c], grid[2][c], grid[3][c]];
        row = slide(row);

        for (let r = 0; r < rows; r++){
            grid[r][c] = row[r];
            let tile = document.getElementById(r.toString()+","+c.toString());
            let number = grid[r][c];
            updateTile(tile,number);
        }
    }
}

function slideDown(){
    for (let c = 0; c < columns; c++){
        let row = [grid[0][c], grid[1][c], grid[2][c], grid[3][c]];
        row.reverse();
        row = slide(row);
        row.reverse();
        for (let r = 0; r < rows; r++){
            grid[r][c] = row[r];
            let tile = document.getElementById(r.toString()+","+c.toString());
            let number = grid[r][c];
            updateTile(tile,number);
        }
    }
}

function addNewTwo(){
    if (isFull()){
        return;
    }

    let addedNewTwo = false;
    while (!addedNewTwo){
        let r = Math.floor(Math.random() * rows);
        let c = Math.floor(Math.random() * columns);

        if(grid[r][c] == 0){
            grid[r][c] = 2;
            let tile = document.getElementById(r.toString()+","+c.toString());
            tile.innerText = "2";
            tile.classList.add("tile2");
            addedNewTwo = true;
        }
    }
}

function isFull(){
    for(let r = 0; r < rows; r++){
        for(let c = 0; c < columns; c++){
            if(grid[r][c] == 0){
                return false;
            }
        }
    }
    return true;
}