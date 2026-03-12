import { Canvas } from '@react-three/fiber'
import { RotatingCube } from "./Objects/RotatingCube";
import { Settings } from "./Settings.tsx";

export function CanvasContainer() {
  return (
    <div className="h-screen w-screen bg-black">
      <Canvas camera={{ position: [2, 1, 5] }}>
        <Settings />
        <RotatingCube color="#893be3" />
      </Canvas>
    </div>
  )
}
