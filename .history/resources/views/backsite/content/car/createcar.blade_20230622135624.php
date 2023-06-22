@extends('backsite.dashboard')

@section('content')

<div>
    <form action="{{ route('car.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 mb-2" for="message">
                Message
            </label>
            <textarea name="message" id="message" rows="5" class="form-control w-full p-2 border border-gray-400 rounded" placeholder="Type message here..."></textarea>
        </div>
        <div class="flex items-center justify-end">
            <button class="flex items-center space-x-1 bg-slate-800 hover:bg-slate-700 text-white font-semibold py-2 px-4 rounded" onclick="getContent()" type="submit">
                <img width="25" height="25" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwY
                AAACi0lEQVR4nO2ZPWsVQRSGR5AkYmNSGhHsRLFTwbj6U9RYWPgDQoiFlX/Aj0IsBPEjjYmgVkLAwkLFD4SQiJ3R2iRGMXrJIwdP
                dJzcOzubmd07kPvAwl7uzpn3nT17dmbWmB5bFGAIOAs8AOaBFT3kfBoYBQZNbgA7gAvAEuUsAhPSxuQAsBt4QXXeAHu7LX4P8Mkj
                cgQoPP8vAMPdTJtXviE2/6718RIYqNKxjMgk8BloUZ2TGkdyngQGhPEQ4duBa8Tx1qo2SwkNLJZWpwTihYsaS0olCQ0IZ8rSxuYh
                cAToC8i6dvGkzqc2MOXrcNIWvxnRTrwPNRiY93UoD+w6hxMYWLbijUTEKaw4y74L7WqzqbTxGCgi4pwINbDhtsYAvK8hheaaNDBd
                g4H7TRoYrcHAqSYNDOnLJ5WBL8CuxgxozImEBsbKOqvDwIBOxGINPC+dzNVhQOMO65S4E4VTKl0+ynoipKNaDFgLGhnFqrwOXtDU
                acBKp/GQB5s/D+wY0K9ti64bsPoZlFmlvifmgK96yPkUcHq92gDbgPPAajYGqgA8C9aUqYG/pL24IaiiqWegBthqd6CVckETC9Bv
                6WmFNEi6pIwFOGrpWQhpcM9q8KgRlR6Ax5ae2yENjts5JyZ0FBpLJ6BP+7TFrwHHQgNcwc8qcCkgzk7gBvCTeC5XGQHZWrxaEvBH
                SYyDwGwC4WsiXjQFG7BEyJb3XZ3Hb9jc9bSTSdq3CNEt7fNOcNpUMNXRgG6jX3fEfAfOmVyggwFgP/DOES9T40MmJ2hjQLY59AOd
                zS15iE1u8D/5p4yLI3a2ze8DJmeAX+3KBnAzy5RxAZ46wle8X0xyA9gHPNEF+Ez2KdOjh/HyG15WjyAWMIFHAAAAAElFTkSuQmCC">
                <span>
                    Comment
                </span>
            </button>
        </div>
    </form>
</div>

@endsection