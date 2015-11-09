"use strict";



var MessageStore = function(){
  var items = []

}();


var Guestbook = React.createClass({
  getInitialState: function() {
    return {
      items: [{name: 'Joel', message: 'Hej'}]
    };
  },
  onSubmit: function(data) {

  },
  render: function() {
    return (
      <div className="guest_book">
        <MessageForm onSubmit={this.onSubmit}/>
        <MessageList items={this.state.items} />
      </div>
    );
  }
});

var MessageForm = React.createClass({
  handleSubmit: function(e) {
    e.preventDefault()
    var name = this.refs.name.value.trim();
    var msg = this.refs.message.value.trim();
    if (!name || !msg) {
      return;
    }
    this.props.onSubmit({name: name, msg: msg});
    this.refs.name.value = '';
    this.refs.message.value = '';
  },
  render: function() {
    return (
      <form className="message_form" onSubmit={this.handleSubmit}>
        <input type="text" placeholder="Name" ref="name"/>
        <textarea placeholder="Message" ref="message"/>
        <input type="submit" />
      </form>
    );
  }
});

var MessageList = React.createClass({
  render: function() {
    return (
      <div className="message_list">
        {this.props.items.map(function(item) {
          return <div className="message">
            <b>{item.name}:</b> {item.message}
          </div>
        })}
      </div>
    );
  }
});

ReactDOM.render(
  <Guestbook />
  ,document.getElementById('content')
);
