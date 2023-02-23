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
        [2,2,2,2],
        [2,2,2,2],
        [4,4,8,8],
        [4,4,8,8]
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
    if (fleche.code == "ArrowLeft"){
        slideLeft();
    }
    if (fleche.code == "ArrowRight"){
        slideRight();
    }
})

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