"use strict";


var Guestbook = React.createClass({
  refresh: function() {
    $.ajax({
      url: "api/get_messages.php",
      dataType: 'json',
      cache: false,
      success: function(items) {
        this.setState({items: items});
      }.bind(this),
      error: function(xhr, status, err) {
        console.error("Refresh error: ", status, err.toString());
      }.bind(this)
    });
  },
  getInitialState: function() {
    return { items: [] };
  },
  componentDidMount: function() {
    this.refresh();
    setInterval(this.refresh, 3000);
  },
  onSubmit: function(item) {
    console.log(item)
    $.ajax({
      url: "api/add_message.php",
      dataType: 'text',
      type: 'POST',
      data: JSON.stringify(item),
      success: function() {
        this.refresh();
      }.bind(this),
      error: function(xhr, status, err) {
        console.error("Post error: ", status, err.toString());
      }.bind(this)
    });
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
  onSubmit: function(e) {
    e.preventDefault()
    var name = this.refs.name.value.trim();
    var msg = this.refs.message.value.trim();
    if (!name || !msg) {
      return;
    }
    this.props.onSubmit({name: name, message: msg});
    this.refs.name.value = '';
    this.refs.message.value = '';
  },
  render: function() {
    return (
      <form className="message_form" onSubmit={this.onSubmit}>
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
