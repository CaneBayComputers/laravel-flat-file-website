@extends('templates.main')

@section('content')

<!-- Feature Page Content -->

<div class="container my-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold">Discover the World of Warrior Cats 🐾</h1>
        <p class="lead">Dive into the epic adventures and rich lore of the Warrior Cats universe. Experience tales of bravery, loyalty, and destiny.</p>
    </div>

    <div class="row align-items-center mb-5">
        <div class="col-md-6">
            <img src="https://www.placecats.com/600/400" alt="Warrior Cats" class="img-fluid rounded shadow">
        </div>
        <div class="col-md-6">
            <h2 class="mb-3">Epic Tales of the Clans</h2>
            <p>Warrior Cats follows the lives of clans of wild cats in their forest and lake territories. Embark on journeys with courageous leaders, wise medicine cats, and fearless warriors who live by the warrior code.</p>
            <p>With riveting plotlines and complex characters, Warrior Cats offers an immersive world for readers of all ages who seek adventure and heart-pounding excitement.</p>
        </div>
    </div>

    <div class="row text-center">
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <img src="https://www.placecats.com/300/300" alt="Clan Hierarchy" class="img-fluid rounded-circle mb-3">
                <div class="card-body">
                    <h5 class="card-title">Clan Hierarchy 🐱</h5>
                    <p class="card-text">Explore the intricate structure of clans, from leaders and deputies to medicine cats and apprentices, each playing a vital role in their community.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <img src="https://www.placecats.com/301/301" alt="Warrior Code" class="img-fluid rounded-circle mb-3">
                <div class="card-body">
                    <h5 class="card-title">Warrior Code 📜</h5>
                    <p class="card-text">Understand the sacred code that guides every warrior's life, emphasizing loyalty, bravery, and honor among the clans.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <img src="https://www.placecats.com/302/302" alt="Epic Battles" class="img-fluid rounded-circle mb-3">
                <div class="card-body">
                    <h5 class="card-title">Epic Battles ⚔️</h5>
                    <p class="card-text">Relive legendary battles and rivalries that shape the destiny of clans, filled with courage, strategy, and heart-stopping action.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center my-5">
        <h2 class="fw-bold">Join the Adventure!</h2>
        <p class="lead">Whether you're a kit, apprentice, or seasoned warrior, there's always a new story to uncover in the world of Warrior Cats. 🐾</p>
        <a href="/contact" class="btn btn-primary btn-lg mt-3">Become a Clanmate</a>
    </div>
</div>

@endsection
