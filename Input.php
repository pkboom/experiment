<?php

User::with('posts')->whereId(3)->get()
