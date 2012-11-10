$(function() {
    command = {
        historyAdd: function(element) {
            command.history.push(element);
            command.historyIndex = command.history.length;
        },
        historyUp: function(input) {
            this.historyIndex = Math.max(0, this.historyIndex - 1);
            input.val(command.history[command.historyIndex]);
        },
        historyDown: function(input) {
            this.historyIndex = Math.min(this.history.length, this.historyIndex + 1);
            input.val(command.history[command.historyIndex]);
        },
        history: [],
        historyIndex: 0
    }
});
