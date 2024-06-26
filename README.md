# Places to check when updating

DatabaseSeeder.php
script.sh
.env

[Basic writing and formatting syntax](https://docs.github.com/en/get-started/writing-on-github/getting-started-with-writing-and-formatting-on-github/basic-writing-and-formatting-syntax)

```mermaid
flowchart TD;
    A-->B;
    A-->C;
    B-->D;
    C-->D;
```

```mermaid
sequenceDiagram
participant Server
participant Browser
Note right of Browser: User loads page
Browser->>Server: Standard HTTP request
activate Server
Note left of Server: Laravel renders page containing a Livewire component
Note left of Server: Livewire component renders itself as HTML <br/>and embeds a JSON snapshot of its state in the HTML
Server->>Browser: Standard HTTP response
deactivate Server
Note right of Browser: Browser renders page
Note right of Browser: Livewire's JavaScript initializes components on <br/>page and stores state in JavaScript runtime
Note right of Browser: User clicks a Livewire button on page
Note left of Browser: Livewire component's state snapshot is sent <br/>along with what action should be performed
Browser-->>Server: Ajax Request
activate Server
Note left of Server: Livewire component is created from state snapshot
Note left of Server: Livewire component handles action
Note left of Server: Livewire component is rendered to new HTML
Note left of Server: Livewire creates new state snapshot
Server->>Browser: Ajax response
deactivate Server
```
