![alt text](https://upload.wikimedia.org/wikipedia/commons/thumb/4/43/Phoenix-Fabelwesen.jpg/220px-Phoenix-Fabelwesen.jpg "A phoenix depicted in a book by FJ Bertuch")

[_A phoenix depicted in a book by FJ Bertuch_](https://commons.wikimedia.org/wiki/File:Phoenix-Fabelwesen.jpg)


# Phoenix
A PHP project to create a distributed and decentralized system for selecting lottery winners and to ensure game fairness with an open system.

This is a project that is currently under development. I'll keep updating this repository.

[Read the wiki for more info.](https://github.com/muneebtatar/phoenix/wiki)

<h1>Update Log</h1>

This is the first commit in the Phoenix repository with any code. We have laid down the basic foundations for the blockchain ledger.

Phoenix follows the the <a href="https://en.wikipedia.org/wiki/Front_controller">front controller</a> software design pattern; an application with a single controller that handles all the requests - in this case, the controller is the <code>init.php</code> file.

For the sake of simplicity, Phoenix will use HTTP GET requests during early days of development. Though we will use POST requests or sockets as we implement the networking functionality.

<h3>Creating blockchains and blocks</h3>

 **- Creating blockchains**
 
 Just as we <a href="https://github.com/muneebtatar/phoenix/wiki/A-look-at-the-public-blockchain-ledger">mentioned in the wiki</a>, Phoenix consists of rounds and each round has it's own blockchain.

You can make a blockchain by making a GET request with the parameter <code>createBlockchain</code>.  This will result in a blockchain generated with a random round ID. 

As we <a href="https://github.com/muneebtatar/phoenix/wiki/A-look-at-the-public-blockchain-ledger">said in the wiki</a> before, blockchains in Phoenix are in the JSON file format, thus you can find the newly generated blockchain in the 'blockchain' folder. 

It will look something like this

<img src="https://i.imgur.com/kyJyWTq.png">

As you can see, a genesis block with the <code>special</code> key is automatically generated.

 **- Creating blocks**

You can create blocks by making GET requests with the parameters <code>createBlock</code> and <code>roundId</code>.

After adding two blocks to the blockchain, this is how it looks like

<img src="https://i.imgur.com/cI1ZDvQ.png">

In the next few versions, we are going to work further on the blockchain, introduce the network architecture and integrate Bitcoin.
