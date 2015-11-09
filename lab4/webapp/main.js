"use strict";





var GameBoard = React.createClass({
  render: function() {
    
    for (var i = 0; i < this.dimension; i++)
    
    return (
      <div>
        <ProfilePic username={this.props.username} />
        <ProfileLink username={this.props.username} />
      </div>
    );
  }
});

var Tile = React.createClass({
  render: function() {
    return (
      <div className="tile">
        {this.state.text}
      </div>
    );
  }
});








ReactDOM.render(
  <section>
    <h1>kaka</h1>
    <input type="text" value="kaka" />
    </section>
    ,document.getElementById('content')
);