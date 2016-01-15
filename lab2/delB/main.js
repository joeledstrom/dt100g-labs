"use strict";


var Game = function() {
    
    // PRIVATE:
    
    // Note: null represents the empty slot
    var winningBoard = _.range(1, 16).concat([null]);
    var onUpdateCallback;
    var board;
    
    function swap(x, y) {
        var tmp = board[x];
        board[x] = board[y];
        board[y] = tmp;
    }
    
    function shuffleBoard() {
        board = _.shuffle(winningBoard)
    }
    
    function isFinished() {
        return _.isEqual(winningBoard, board);
    }
    
    return {
        
        // PUBLIC METHODS:
        
        reset: function() {
            shuffleBoard();
            onUpdateCallback(board);
        },
        
        onUpdate: function(callback) {
            onUpdateCallback = callback;
        },
        
        performClick: function(index) {
            if (!isFinished()) {
                                
                if (index > 0 && board[index - 1] === null)
                    swap(index, index - 1);
                else if (index < 16 && board[index + 1] === null)
                    swap(index, index + 1);
                else if (index > 3 && board[index - 4] === null)
                    swap(index, index - 4);
                else if (index < 12 && board[index + 4] === null)
                    swap(index, index + 4);
                else
                    return;
            
                onUpdateCallback(board, isFinished());
            }
        },
        
        cheat: function() {
            board = _.clone(winningBoard)
            swap(14,15);
            onUpdateCallback(board);
        }
    }
}




$(document).ready(function() {
    
    var game = new Game();
     
    $(".cell").click(function() {
        var index = $(this).data("index");
        game.performClick(index);
    });
    
    game.onUpdate(function(board, isFinished) {
        $(".cell").each(function(index) {
            $(this).text(board[index] === null ? " " : board[index]);
            $(this).data("index", index); 
        });
        
        if (isFinished)
            setTimeout(function() { alert("YOU WIN!"); });
    })
    
    game.reset();
    
    $("#resetButton").click(function() {
        game.reset();
    })
    
    $("#cheatButton").click(function() {
        game.cheat();
    })
    
});


